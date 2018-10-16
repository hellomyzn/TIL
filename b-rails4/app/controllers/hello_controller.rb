class HelloController < ApplicationController
  def index
    render text: 'Hello World'
  end
  
  def view
    @msg = 'Hello view'
  end
end
