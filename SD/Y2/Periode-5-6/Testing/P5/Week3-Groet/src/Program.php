<?php

class Groet {
    public function groet($naam) {
        if ($naam == NULL) {
            return "Hallo vriend.";

        } elseif (is_string($naam) && $naam === strtoupper($naam)) {
            return "HALLO " . strtoupper($naam) . "!";

        } elseif (is_array($naam) && count($naam) == 2) {
            return "Hallo " . $naam[0] . " en " . $naam[1] . ".";

        } elseif (is_array($naam) && count($naam) > 2) {
            $komma = implode(', ', array_slice($naam, 0, -1));
            return "Hallo " . $komma . " en " . end($naam) . ".";

        } else {
            return "Hallo " . $naam . ".";
        }
    }
}

?>