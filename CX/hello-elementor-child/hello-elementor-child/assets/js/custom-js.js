// ------------ Image modal box ------------
function onClick(element, value) {
  document.getElementById(value).style.display = "block";
  document.getElementById(`modal-${value}`).src = element.src;
}

function TissueAndSpicules(element, value) {
  // alert(value);
  // alert(`spicules-${value}`);
  document.getElementById(value).style.display = "block";
  document.getElementById(`spicules-${value}`).src = element.src;
}

jQuery(document).ready(function () {

  // jQuery(".btn_find_sponge").click(function () {
  //   // jQuery(".find_sponge_filter").animate({overflow: 'hidden', width: '300px', height: '100%', display: 'block'});
  //   var div = jQuery(".find_sponge_filter");
  //   div.animate({overflow: 'hidden'});
  //   div.animate({width: '300px'});
  //   div.animate({height: '100%'});
  //   div.animate({display: 'block'});
  // });

  var toggleBtn = document.querySelector('.sidebar-toggle');
  var sidebar = document.querySelector('.sidebar');

  toggleBtn.addEventListener('click', function() {
    toggleBtn.classList.toggle('is-closed');
    sidebar.classList.toggle('is-closed');
  })


  jQuery(".reset").click(function(){
    jQuery('.cat_list').val("");
    jQuery(".link").attr("href",'');
  });
  
  jQuery(".cat_list").change(function () {

    var color_box = jQuery('#color_box').val();
    var consist_box = jQuery('#consist_box').val();
    var morph_box = jQuery('#morph_box').val();
    var hab_box = jQuery('#hab_box').val();
    var link = 'http://localhost/wp/sponge/filter-search/?';

    if(color_box.length > 0){
      link += `color_box=${color_box}`;
    }

    if(consist_box.length > 0){
      if(link.length > 1){
        link += '&';
      }
      link += `consist_box=${consist_box}`;
    }

    if(morph_box.length > 0){
      if(link.length > 1){
        link += '&';
      }
      link += `morph_box=${morph_box}`;
    }

    if(hab_box.length > 0){
      if(link.length > 1){
        link += '&';
      }
      link += `hab_box=${hab_box}`;
    }

    if(link.length == 1){
      link += '"';
    }
    jQuery(".link").attr("href", link);
    
    
    // var selected_cat = [];
    
    // jQuery.each(jQuery(".cat_list"), function () {
    //   selected_cat.push(jQuery(this).val());
    // });
    // alert(selected_cat);    

    jQuery.ajax({
      url: frontendajax.ajaxurl,
      type: "post",
      data: {
        action: "filter_sponge_post",
        color_box : color_box,
        consist_box : consist_box,
        morph_box : morph_box,
        hab_box : hab_box,
      },
      success: function (data) {
        jQuery(".filter-response").html(data);
      },
    });
  });
});
