<?php
$target = '/home/arifsidd/public_html/demo-ptkontragtor.arifsiddikm.biz.id/storage/app/public';
$link   = '/home/arifsidd/public_html/demo-ptkontragtor.arifsiddikm.biz.id/public/storage';
if (symlink($target, $link)) {
    echo "Symlink berhasil dibuat";
} else {
    echo "Gagal buat symlink";
}