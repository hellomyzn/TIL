package main

import (
	"gin-introduction/models"

	"github.com/gin-gonic/gin"
)

func main() {
	items := []models.Item{
		{ID: 1, Name: "product 1", Price: 1000,
			Description: "desc 1", SoldOut: false},
		{ID: 2, Name: "product 2", Price: 2000,
			Description: "desc 2", SoldOut: true},
		{ID: 3, Name: "product 3", Price: 3000,
			Description: "desc 3", SoldOut: false},
	}
	router := gin.Default()
	router.GET("/sample", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"message": "pong",
		})
	})
	router.Run() // デフォルトで0.0.0.0:8080で待機します
}
