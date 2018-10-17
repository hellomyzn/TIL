class ViewController < ApplicationController
  def keyword

  end

  def form_tag
    @book = Book.new
  end

  def form_for
    @book = Book.new
  end

  def field
    @book = Book.find(11)
  end

  def html5
    @book = Book.find(11)

  end
  
  def select
    @book = Book.find(11)
  end

  def col_select
    @book = Book.new(publish: 'hogehoge')
    @books = Book.select(:publish).distinct
  end

  def group_select
    @review = Review.new
    @authors = Author.all
  end

  def select_tag
    @books = Book.all
    @authors = Author.all
  end

  def dat_select
    @book = Book.find(1)
  end
  
  def col_radio
    @book = Book.new(publish: 'hoge')
    @books = Book.select(:publish).distinct
  end

  def simpole_format
  end

end

