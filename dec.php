<?php
error_reporting(0);

# Coded by L0c4lh34rtz - IndoXploit

if(isset($argv[1])) {
    $wordlist_file = $argv[1];
    if(file_exists($wordlist_file)) {
        $wordlist = file($wordlist_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $hashes = explode("\n", file_get_contents($argv[2])); // Load hashes from file
        foreach($hashes as $hash) {
            foreach($wordlist as $word) {
                print " [+]"; print (password_verify($word, $hash)) ? "$hash -> $word (OK)\n" : "$hash -> $word (SALAH)\n";
            }
        }
    } else {
        print "File wordlist tidak ditemukan!\n";
    }
} else {
    print "usage: php ".$argv[0]." wordlist.txt list.txt\n";
}
?>
