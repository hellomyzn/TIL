class ViewController < ApplicationController
  def keyword

  end

  def form_tag
    @book = Book.new
  end

  def form_for
    @book = Book.new
  end
end
