import sys
input = sys.stdin.readline

def main():
    h, w = map(int, input().split())
    s = [input() for _ in range(h)]
    
    tokens = []

    for i in range(h):
        for j in range(w):
            if s[i][j] == 'o':
                tokens.append((i,j))

    x1, y1 = tokens[0]
    x2, y2 = tokens[1]

    print(abs(x1 - x2) + abs(y1 - y2))

if __name__ == "__main__":
    main()