# syntax=docker/dockerfile:1

FROM golang:1.25.4-bookworm

WORKDIR /go/src/app

# Cache module downloads first
COPY src/go.mod ./
RUN go mod download

# Copy application source
COPY src/ ./

# Build the binary for faster start up in production
RUN go build -o bin/server ./cmd/server

EXPOSE 8080

CMD ["/go/src/app/bin/server"]
