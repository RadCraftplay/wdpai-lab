<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Server.php';

class ServerRepository extends Repository {
    public function getServers(): array {
        $servers = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * from public.servers
        ');
        $stmt->execute();
        $server_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($server_rows as $server) {
            $servers[] = new Server(
                $server["submission_id"],
                $server["submitter_id"],
                $server["title"],
                $server["service_type_id"],
                $server["address"],
                $server["description"]
            );
        }

        return $servers;
    }
}