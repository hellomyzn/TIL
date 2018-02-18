class ListingsController < ApplicationController
  before_action :authenticate_user!
  before_action :set_listing, only: [:update, :basics, :description, :address, :price, :photos, :calender, :bankaccount, :publish]

  def index; end

  def show; end

  def new
    # 現在のユーザーのリスティングの作成
    @listing = current_user.listings.build
  end

  def create
    # パラメータとともに現在のユーザーのリスティングを作成
    @listing = current_user.listings.build(listing_params)

    if @listing.save
      redirect_to manage_listing_basics_path	@listing, notice: 'リスティングを作成・保存をしました'
    else
      redirect_to new_listing_path, notice: 'リスティングを作成・保存できませんでした'
    end
  end

  def edit; end

  def update
    if @listing.update(listing_params)
      redirect_to :back, notice: "更新できました"
    end
  end

  def basics
    @listing = Listing.find(params[:id])
  end

  def description
    @listing = Listing.find(params[:id])
  end

  def address
    @listing = Listing.find(params[:id])
  end

  def price
    @listing = Listing.find(params[:id])
  end

  def photos
    @listing = Listing.find(params[:id])
  end

  def calender
    @listing = Listing.find(params[:id])
  end

  def bankaccount
    @listing = Listing.find(params[:id])
  end

  def publish
    @listing = Listing.find(params[:id])
  end

  private

  def listing_params
    params.require(:listing).permit(:home_type, :pet_type, :breeding_years, :pet_size, :price_pernight)
  end

  def set_listing
    @listing = Listing.find(params[:id])
  end
end
