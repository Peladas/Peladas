<?php

namespace App\Models;

class Model {
    public function toArray(): array {
        $props = [];
        foreach ($this as $key => $value) {
            $props[$key] = $value;
        }
        return $props;
    }
}
