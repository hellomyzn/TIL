package main

import (
	"gin-introduction/config"
	"gin-introduction/controllers"
	"gin-introduction/repositories"
	"gin-introduction/services"

	"github.com/gin-gonic/gin"
)

func main() {
	config.Initialize()
	db := config.SetupDB()

	// items := []models.Item{
	// 	{ID: 1, Name: "product 1", Price: 1000,
	// 		Description: "desc 1", SoldOut: false},
	// 	{ID: 2, Name: "product 2", Price: 2000,
	// 		Description: "desc 2", SoldOut: true},
	// 	{ID: 3, Name: "product 3", Price: 3000,
	// 		Description: "desc 3", SoldOut: false},
	// }

	// itemRepository := repositories.NewItemMemoryRepository(items)

	itemRepository := repositories.NewItemRepository(db)
	itemService := services.NewItemService(itemRepository)
	itemController := controllers.NewItemController(itemService)

	router := gin.Default()
	router.GET("/items", itemController.FindAll)
	router.GET("/items/:id", itemController.FindById)
	router.POST("/items", itemController.Create)
	router.PUT("/items/:id", itemController.Update)
	router.DELETE("/items/:id", itemController.Delete)
	router.Run() // デフォルトで0.0.0.0:8080で待機します
}
