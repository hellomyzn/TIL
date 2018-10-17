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
end
