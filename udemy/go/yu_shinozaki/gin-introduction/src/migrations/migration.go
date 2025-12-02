package main

import (
	"gin-introduction/config"
	"gin-introduction/models"
)

func main() {
	config.Initialize()
	db := config.SetupDB()

	if err := db.AutoMigrate(&models.Item{}, &models.User{}); err != nil {
		panic("Failed to migrate database")
	}
}
