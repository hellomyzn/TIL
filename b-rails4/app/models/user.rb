class User < ActiveRecord::Base
  validates :agreement, acceptance: {on: true}
  validates :email, presence: {unless: 'dm.blank?'}
end
