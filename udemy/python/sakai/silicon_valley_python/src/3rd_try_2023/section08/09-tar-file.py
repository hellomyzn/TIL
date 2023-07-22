import tarfile
import os
import pathlib

if not os.path.exists('test_dir'):
    os.mkdir('test_dir')
    os.mkdir('test_dir/sub_dir')
    pathlib.Path('test_dir/test.txt').touch()
    pathlib.Path('test_dir/sub_dir/sub-test.txt').touch()

    with open('test_dir/test.txt', 'w', encoding='utf-8') as f:
        f.write('test for tar\n')

    with open('test_dir/sub_dir/sub-test.txt', 'w', encoding='utf-8') as f:
        f.write('sub-dir for tar\n')


if not os.path.exists('test.tar.gz'):
    with tarfile.open('test.tar.gz', 'w:gz') as tr:
        tr.add('test_dir')

if os.path.exists('test.tar.gz'):
    with tarfile.open('test.tar.gz', 'r:gz') as tr:
        tr.extractall(path='test_tar')
        with tr.extractfile('test_dir/sub_dir/sub-test.txt') as f:
            print(f.read())
