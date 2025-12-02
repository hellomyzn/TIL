package models

import "gorm.io/gorm"

type User struct {
	gorm.Model
	Email    string `gorm:"note null;unique"`
	Password string `gorm:"note null"`
}
