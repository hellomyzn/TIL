class RecordController < ApplicationController
  def find
    @books = Book.find([2, 5, 10])
    render 'hello/list'
  end

  def find_by
    @book = Book.find_by(publish: '技術評論社')
    render 'books/show'
  end


  def find_by2
    @book = Book.find_by(publish: '技術評論社', price: 2919)
    render 'books/show'
  end

  def where
    @books = Book.where(publish: '技術評論社')
    render 'hello/list'
  end

  def ph1
    @books = Book.where('publish = ? AND price >= ?', params[:publish], params[:price])
    render 'hello/list'
  end

  def not
    @books = Book.where.not(isbn: params[:id])
    render 'books/index'
  end

  def order
    @books = Book.where(publish: '技術評論社').order(published: :desc)
    render 'hello/list'
  end

  def reorder
    @books = Book.order(:publish).order(:price)
    render 'books/index'
  end

  def select 
    # これは動かない
    @books = Book.where('price >= 2000').select(:title, :price)
    render 'hello/list'
  end

  def select2
    # これも動かない
    @pubs = Book.select(:publish).distinct.order(:publish)
  end
  
  def offset
    @books = Book.order(published: :desc).limit(3).offset(4)
    render 'hello/list'
  end

  def page
    page_size = 3
    page_num = params[:id] == nil ? 0 : params[:id].to_i - 1
    @books = Book.order(published: :desc).limit(page_size).offset(page_size * page_num)
    render 'hello/list'
  end

  def last 
    @book = Book.order(published: :desc).last
    render 'books/show'

  end

  def groupby 
    @books = Book.select('publish, AVG(price) AS avg_price').group(:publish)

  end

  def havingby
    @books = Book.select('publish, AVG(price) AS avg_price').group(:publish).having('AVG(price) >= ?' , 2500)
    render 'record/groupby'
  end
  
  def where2
    @books = Book.all
    @books.where!(publish: '技術評論社')
    @books.order!(:published)
    render 'books/index'
  end

  def unscope

    @books = Book.where(publish: '技術評論社').order(:price).select(:isbn, :title).unscope(:where, :select )
    render 'books/index'
    

  end

  def none
    case params[:id]
    when 'all'
      @books = Book.all
    when 'new'
      @books = Book.order('published DESC').limit(5)
    when 'cheap'
      @books = Book.order(:price).limit(5)
    else
      @books = Book.none
    end
    render 'books/index'
  end

  def pluck
    render text: Book.where(publish: '技術評論社').pluck(:title, :price)
  end

  def exits

    flag = Book.where(publish: '新評論社').exists?
    render text: "存在するか？ : #{flag}"
  end

  def def_scope

    render text: Review.all.inspect
  end

  def count
    cnt = Book.where(publish: '技術評論社').count
    render text: "#{cnt}件です。"

  end

  def average 
    price = Book.where(publish: '技術評論社').average(:price)
    render text: "平均価格は#{price}円です"
  end

  def literal_sql
    # できないp214
    @books = Book.find_by_sql()
    render 'record/groupby'
  end
end
