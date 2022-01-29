<?php

namespace HenriqueBS0\LinkPack\Controllers;

class ControllerLink {
    public function list() {
        return $this->response(links());
    }

    public function detail($id) {
        foreach (links() as $link) {
            if($link->id == $id) {
                return $this->response($link);
            }
        }
    }

    public function create() {

        $link = (object) [
            'id'   => time(),
            'url'  => $_POST['url'],
            'name' => $_POST['name']
        ];

        $links = links();

        $links[] = $link;

        links($links);

        return $this->response($link);
    }

    public function update($id) {
        $links = links();

        foreach ($links as $index => $link) {
            if($link->id == $id) {
                $links[$index]->name = $_POST['name'];
                $links[$index]->url = $_POST['url'];
            }
        }

        links($links);

        return $this->response('ok');
    }

    public function destroy($id) {
        $links = links();

        $newLinks = [];

        foreach ($links as $link) {
            if($link->id != $id) {
                $newLinks[] = $link;
            }
        }

        links($newLinks);

        return $this->response('ok');
    }

    private function response($data) {
        header('Content-type: application/json');
        echo json_encode($data);
    }
}