import subprocess

subprocess.run(['ls', '-al'], check=False)
subprocess.run('ls -al | grep test', shell=True, check=False)
