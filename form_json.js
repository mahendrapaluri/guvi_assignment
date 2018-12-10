$.getJSON("regis.json", function(data){
      var items = [];

      $.each(data, function(key, val){
        items.push("<tr>");
        items.push("<td id='"+key+"'>"+val.name+"</td>");
        items.push("<td id='"+key+"'>"+val.age+"</td>");        
        items.push("<td id='"+key+"'>"+val.degree+"</td>");
        items.push("<td id='"+key+"'>"+val.gender+"</td>");
        items.push("<td id='"+key+"'>"+val.email+"</td>");
        items.push("<td id='"+key+"'>"+val.password+"</td>");
        items.push("<td id='"+key+"'>"+val.phone_number+"</td>");
        items.push("</tr>");
      }); 
      $("<tbody/>", {html: items.join("")}).appendTo("table");

    });