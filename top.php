<?php

const MAX_WORD_LENGTH     = 5;
const FILTER_WORDS_LENGTH = 3;

function generateText(int $rowsCount): string
{
    return implode(
        PHP_EOL,
        array_map('generateRow', range(0, $rowsCount))
    );
}

function generateRow(): string
{
    return implode(' ', array_map('generateWord', range(0, rand(1, 10))));
}

function generateWord(): string
{
    $word = '';
    foreach (range(1, rand(1, MAX_WORD_LENGTH)) as $i) {
        $word .= chr(rand(97, 122));
    }

    return $word;
}

function toWords(string $text): array
{
    $text = str_replace(PHP_EOL, ' ', $text);

    return explode(' ', $text);
}

function filterWords(array $words): array
{
    return array_filter($words, function (string $word) {
        return strlen($word) >= FILTER_WORDS_LENGTH;
    });
}

function topUsed(array $words, int $limit): array
{
    $total = count($words);
    $top   = [];
    foreach ($words as $word) {
        $obj = $top[$word] ?? ['word' => $word, 'count' => 0];
        $obj['count']++;
        $top[$word] = $obj;
    }

    usort($top, function ($a, $b) {
        return $a['count'] < $b['count'] ? 1 : -1;
    });

    return array_map(function ($obj) use ($total) {
        return toChart($obj, $total);
    }, array_slice($top, 0, $limit));
}

function toChart(array $obj, int $total): array
{
    return [
        'y'          => (int)($obj['count'] / $total * 100),
        'label'      => number_format($obj['count'] / $total * 100, 2),
        'indexLabel' => $obj['word']
    ];
}

$text         = @file_get_contents('text') ?: generateText(1000);
$topUsedWords = topUsed(filterWords(toWords($text)), 10);

echo json_encode($topUsedWords);
