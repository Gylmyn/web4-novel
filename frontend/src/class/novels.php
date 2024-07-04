<?php
function getNovelsByGenres($conn) {
    $sql = "SELECT novel.id, novel.cover, novel.title, novel.author, genre.name AS genre
            FROM novel
            JOIN genre ON novel.genre_id = genre.id
            ORDER BY genre.name";

    $result = $conn->query($sql);

    $novels = array();
    while ($row = $result->fetch_assoc()) {
        $novels[] = $row;
    }

    return $novels;
}

function getAllGenres($conn) {
    $sql = "SELECT * FROM genre";
    $result = $conn->query($sql);

    $genres = array();
    while ($row = $result->fetch_assoc()) {
        $genres[] = $row;
    }

    return $genres;
}

function getNovelById($conn, $id) {
    $sql = "SELECT novel.id, novel.cover, novel.title,novel.sinopsis,novel.author, genre.name AS genre
            FROM novel
            JOIN genre ON novel.genre_id = genre.id
            WHERE novel.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getChaptersByNovelId($conn, $novel_id) {
    $sql = "SELECT * FROM bab WHERE novel_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $novel_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $bab = array();
    while ($row = $result->fetch_assoc()) {
        $bab[] = $row;
    }

    return $bab;
}


function getChapterById($conn, $chapter_id) {
    $sql = "SELECT * FROM bab WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $chapter_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>
