jQuery(document).ready(function($) {
	//store service items
	var fillingBlocks = $('.cd-service').not('.cd-service-divider');

	//store service items top position into an array
	var topValueFillingBlocks = [];
	fillingBlocks.each(function(index){
		var topValue = $(this).offset().top;
		topValueFillingBlocks[topValueFillingBlocks.length] = topValue;
	});

	//add the .focus class to the first service item
	fillingBlocks.eq(0).addClass('focus');

	$(window).on('scroll', function(){
		//check which service item is in the viewport and add the .focus class to it
		updateOnFocusItem(fillingBlocks.slice(1));
		//evaluate the $(window).scrollTop value and change the body::after and body::before background accordingly (using the new-color-n classes)
		bodyBackground(topValueFillingBlocks);
	});
});

function updateOnFocusItem(items) {
	items.each(function(){
		( $(this).offset().top - $(window).scrollTop() <= $(window).height()/2 ) ? $(this).addClass('focus') : $(this).removeClass('focus');
	});
}

function bodyBackground(itemsTopValues) {
	var topPosition = $(window).scrollTop() + $(window).height()/2,
		servicesNumber = itemsTopValues.length;
	$.each(itemsTopValues, function(key, value){
		if ( (itemsTopValues[key] <= topPosition && itemsTopValues[key+1] > topPosition) || (itemsTopValues[key] <= topPosition && key+1 == servicesNumber ) ) {	
			$('body').removeClass('new-color-'+(key-1)+' new-color-'+(key+1)).addClass('new-color-'+key);
		}
	});
}


var ringer = {
  //countdown_to: "10/31/2014",
  countdown_to: "10/12/2017",
  rings: {
    'DAYS': { 
      s: 86400000, // mseconds in a day,
      max: 365
    },
    'HH': {
      s: 3600000, // mseconds per hour,
      max: 24
    },
    'MM': {
      s: 60000, // mseconds per minute
      max: 60
    },
    'SS': {
      s: 1000,
      max: 60
    }
   },
  r_count: 5,
  r_spacing: 10, // px
  r_size: 60, // px
  r_thickness: 3, // px
  update_interval: 11, // ms
    
    
  init: function(){
   
    $r = ringer;
    $r.cvs = document.createElement('canvas'); 
    
    $r.size = { 
      w: ($r.r_size + $r.r_thickness) * $r.r_count + ($r.r_spacing*($r.r_count-1)), 
      h: ($r.r_size + $r.r_thickness) 
    };
    


    $r.cvs.setAttribute('width',$r.size.w);           
    $r.cvs.setAttribute('height',$r.size.h);
    $r.ctx = $r.cvs.getContext('2d');
    $(document.body).append($r.cvs);
    $r.cvs = $($r.cvs);    
    $r.ctx.textAlign = 'center';
    $r.actual_size = $r.r_size + $r.r_thickness;
    $r.countdown_to_time = new Date($r.countdown_to).getTime();
    $r.cvs.css({ width: $r.size.w+"px", height: $r.size.h+"px" });
    $r.go();
  },
  ctx: null,
  go: function(){
    var idx=0;
    
    $r.time = (new Date().getTime()) - $r.countdown_to_time;
    
    
    for(var r_key in $r.rings) $r.unit(idx++,r_key,$r.rings[r_key]);      
    
    setTimeout($r.go,$r.update_interval);
  },
  unit: function(idx,label,ring) {
    var x,y, value, ring_secs = ring.s;
    value = parseFloat($r.time/ring_secs);
    $r.time-=Math.round(parseInt(value)) * ring_secs;
    value = Math.abs(value);
    
    x = ($r.r_size*.5 + $r.r_thickness*.5);
    x +=+(idx*($r.r_size+$r.r_spacing+$r.r_thickness));
    y = $r.r_size*.5;
    y += $r.r_thickness*.5;

    
    // calculate arc end angle
    var degrees = 360-(value / ring.max) * 360.0;
    var endAngle = degrees * (Math.PI / 180);
    
    $r.ctx.save();

    $r.ctx.translate(x,y);
    $r.ctx.clearRect($r.actual_size*-0.5,$r.actual_size*-0.5,$r.actual_size,$r.actual_size);

    // first circle
    $r.ctx.strokeStyle = "rgba(128,128,128,0.2)";
    $r.ctx.beginPath();
    $r.ctx.arc(0,0,$r.r_size/2,0,2 * Math.PI, 2);
    $r.ctx.lineWidth =$r.r_thickness;
    $r.ctx.stroke();
   
    // second circle
    $r.ctx.strokeStyle = "#000d1f";
    $r.ctx.beginPath();
    $r.ctx.arc(0,0,$r.r_size/2,0,endAngle, 1);
    $r.ctx.lineWidth =$r.r_thickness;
    $r.ctx.stroke();
    
    // label
    $r.ctx.fillStyle = "#F5F5F5";
   
    $r.ctx.font = '10px Helvetica';
    $r.ctx.fillText(label, 0, 18);
    $r.ctx.fillText(label, 0, 18);   
    
    $r.ctx.font = 'bold 20px Helvetica';
    $r.ctx.fillText(Math.floor(value), 0, 5);
    
    $r.ctx.restore();
  }
}

ringer.init();


