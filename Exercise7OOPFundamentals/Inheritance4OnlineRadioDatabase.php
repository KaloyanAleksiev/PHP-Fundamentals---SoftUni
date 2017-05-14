<?php

class InvalidSongException extends Exception {
    
}

class InvalidArtistNameException extends InvalidSongException {
    
}

class InvalidSongNameException extends InvalidSongException {
    
}

class InvalidSongLengthException extends InvalidSongException {
    
}

class InvalidSongMinutesException extends InvalidSongLengthException {
    
}

class InvalidSongSecondsException extends InvalidSongLengthException {
    
}

class Song {

    private $artistName;
    private $songName;
    private $lengthInSeconds;

    public function __construct(string $artistName, string $songName, int $minutes, int $seconds) {
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $this->setLengthInSeconds($minutes, $seconds);
    }

    private function setArtistName(string $artistName) {
        if (!in_array(strlen($artistName), range(3, 20))) {
            throw new InvalidArtistNameException("Artist name should be between 3 and 20 symbols.");
        }
        $this->artistName = $artistName;
    }

    private function setSongName($songName) {
        if (!in_array(strlen($songName), range(3, 30))) {
            throw new InvalidSongNameException("Song name should be between 3 and 30 symbols.");
        }
        $this->songName = $songName;
    }

    private function setLengthInSeconds(int $minutes, int $seconds) {
        if (!in_array($minutes, range(0, 14))) {
            throw new InvalidSongMinutesException("Song minutes should be between 0 and 14.");
        }
        if (!in_array($seconds, range(0, 59))) {
            throw new InvalidSongSecondsException("Song seconds should be between 0 and 59.");
        }
        if (!in_array(($minutes + $seconds), range(0, ((14 * 60) + 59)))) {
            throw new InvalidSongLengthException("Invalid song length.");
        }
        $this->lengthInSeconds = $seconds + ($minutes * 60);
    }

    public function getLengthInSeconds() {
        return $this->lengthInSeconds;
    }

}

class Playlist {

    private $songs = [];
    private $totalLengthInSeconds = 0;

    public function addSong(Song $song) {
        $this->songs[] = $song;
        $this->totalLengthInSeconds += $song->getLengthInSeconds();
    }

    public function __toString() {
        $hours = floor($this->totalLengthInSeconds / 3600);
        $minutes = floor(($this->totalLengthInSeconds - $hours * 3600) / 60);
        $seconds = $this->totalLengthInSeconds - (($hours * 3600) + ($minutes * 60));
        return "Songs added: " . count($this->songs) . PHP_EOL .
                "Playlist length: " . $hours . "h " . str_pad($minutes, 2, '0', STR_PAD_LEFT) . "m " . str_pad($seconds, 2, '0', STR_PAD_LEFT) . "s";
    }

}

$lines = intval(fgets(STDIN));
$playList = new Playlist();

while ($lines--) {
    $stringSong = trim(fgets(STDIN));
    $arraySong = explode(';', $stringSong);
    $artist = $arraySong[0];
    $songName = $arraySong[1];
    $arrayLength = explode(':', $arraySong[2]);
    $minutes = intval($arrayLength[0]);
    $seconds = intval($arrayLength[1]);
    try {
        $song = new Song($artist, $songName, $minutes, $seconds);
        $playList->addSong($song);
        echo 'Song added.' . PHP_EOL;
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}
echo $playList;
