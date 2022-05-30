import sys
input = sys.stdin.readline

def main():
    a, b, c = map(int, input().split())
    median = a + b + c - max(a, b, c) - min(a, b, c)
    if median == b:
        print("yes")
    else:
        print("No")

if __name__ == "__main__":
    main()