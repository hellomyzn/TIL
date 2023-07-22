import os
import pathlib
import glob
import shutil


print(os.path.exists('test.txt'))
print(os.path.isfile('test.txt'))
print(os.path.isdir('designs'))

if os.path.exists('test.txt'):
    os.rename('test.txt', 'renamed.txt')

if not os.path.exists('symlink.txt'):
    os.symlink('renamed.txt', 'symlink.txt')

if os.path.exists('renamed.txt'):
    os.rename('renamed.txt', 'test.txt')

if not os.path.exists('test_dir'):
    os.mkdir('test_dir')
# os.rmdir('test_dir')

if not os.path.exists('test_dir/test_dir2'):
    os.mkdir('test_dir/test_dir2')

print(os.listdir('test_dir'))
pathlib.Path('test_dir/test_dir2/empty.txt').touch()

shutil.copy('test_dir/test_dir2/empty.txt',
            'test_dir/test_dir2/empty2.txt')
print(glob.glob('test_dir/test_dir2/*'))

shutil.rmtree('test_dir')
print(os.getcwd())
