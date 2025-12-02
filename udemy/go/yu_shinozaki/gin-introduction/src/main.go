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

	authRepository := repositories.NewAuthRepository(db)
	authService := services.NewAuthService(authRepository)
	authController := controllers.NewAuthController(authService)

	router := gin.Default()

	itemRouter := router.Group("/items")
	authRouter := router.Group("/auth")

	itemRouter.GET("", itemController.FindAll)
	itemRouter.GET("/:id", itemController.FindById)
	itemRouter.POST("", itemController.Create)
	itemRouter.PUT("/:id", itemController.Update)
	itemRouter.DELETE("/:id", itemController.Delete)

	authRouter.POST("/signup", authController.Signup)
	router.Run() // デフォルトで0.0.0.0:8080で待機します
}
