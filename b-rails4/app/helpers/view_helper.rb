module ViewHelper
  def format_datetime(datetime, type= :datetime)
    return  '' unless datetime

    case type
      when :datetime
        format = '%Y年%m月%d日 %H:%M:%S'
      when :date
        format = '%Y year %m month %d day'
      when :time
        format = '%H:%M:%S'
    end


    datetime.strftime(format)
  end



  def list_tag(collection, prop)
    content_tag(:ul) do
      collection.each do |element|
        concat content_tag(:li, element.attributes[prop])
      end
    end
  end

  def list_tag2(collectioon, prop)
    list = '<ul>'
    collection.each do |element|
      list.concat('<li>')
      list.concat(h element.attributes[prop])
      list.concat('</ul>')
    end
    raw list.concat('</ul>')
  end

end
