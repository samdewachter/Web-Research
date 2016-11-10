 <?php

class TicketMapper extends Mapper
{
    public function getTickets() {
        $sql = "SELECT t.id, t.title, t.description, c.component
            from tickets t
            join components c on (c.id = t.component_id)";
        $stmt = $this->db->query($sql);

        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new TicketEntity($row);
        }
        return $results;
    }

    /**
     * Get one ticket by its ID
     *
     * @param int $ticket_id The ID of the ticket
     * @return TicketEntity  The ticket
     */
    public function getTicketById($ticket_id) {
        $sql = "SELECT t.id, t.title, t.description, c.component
            from tickets t
            join components c on (c.id = t.component_id)
            where t.id = :ticket_id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(["ticket_id" => $ticket_id]);

        if($result) {
            return new TicketEntity($stmt->fetch());
        }

    }

    public function save(TicketEntity $ticket) {
        $sql = "insert into tickets
            (title, description, component_id) values
            (:title, :description, 
            (select id from components where component = :component))";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "title" => $ticket->getTitle(),
            "description" => $ticket->getDescription(),
            "component" => $ticket->getComponent(),
        ]);

        if(!$result) {
            throw new Exception("could not save record");
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM tickets WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([ "id" => $id ]);

        if(!$result) {
            throw new Exception("could not delete record");
        }
    }

    public function update(TicketEntity $ticket) {
        $sql = "UPDATE tickets
                SET     title      =   :title,
                        description       =   :description,
                        component_id    =   (select id from components where component = :component)
                WHERE id = :id
                LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $result = $stmt->execute([
            "title" => $ticket->getTitle(),
            "description" => $ticket->getDescription(),
            "component" => $ticket->getComponent(),
            "id" => $ticket->getId(),
        ]);

        if(!$result) {
            throw new Exception("could not update record");
        }
    }
}
