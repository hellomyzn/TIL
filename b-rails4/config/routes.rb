Rails.application.routes.draw do
  resources :books
  match ':controller(/:action(/:id))', via: [:get, :post, :patch]
end
