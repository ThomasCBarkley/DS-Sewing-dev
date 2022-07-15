	// build magic list of rotating images
	var list = new Array();
    var rnd=0; 
    var starttime;
    var dtNow = new Date();   
    starttime = dtNow.getTime();
    
    function list_image(src,alt,href) {     
     this.src = src;
     this.alt = alt;     
     this.href = href;     
	 return this;
    }
   
   
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_chain.gif","Check out our Chains","https://www.ds-sewing.com/truck/trucktarp/chain.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_cornerprotector.gif","Check out our Corner Protector","https://www.ds-sewing.com/truck/trucktarp/winch.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_leverchainbinders.gif","Check out our Lever Chain Binders","https://www.ds-sewing.com/truck/trucktarp/chain.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_ratchetchainbinders.gif","Check out our Ratchet Chain Binders","https://www.ds-sewing.com/truck/trucktarp/chain.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_ratchetstraps.jpg","Check out our Ratchet Straps","https://www.ds-sewing.com/truck/trucktarp/tarpaccessories.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_repairkit.gif","Check out our Repair Kits","https://www.ds-sewing.com/truck/trucktarp/tarpaccessories.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_chain.gif","Check out our Chains","https://www.ds-sewing.com/truck/trucktarp/chain.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_tarpbows.gif","Check out our Flexible Tarp Bows","https://www.ds-sewing.com/tarpbows/tarpbow2.php"));
	// aluminium truck accessories
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_aluminiumtruckacc.jpg","Check out our Aluminum Truck Tarp Accessories","https://www.ds-sewing.com/truck_acc/truck_acc.php"));
   // list = list.concat(new list_image("toolbar_images/window/window_saddlebox.gif","Check out our Aluminum Saddle Boxes for Trucks","truck_acc/aluminum_boxes/storageboxes.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_headboard.gif","Check out our Headboards for Trucks","https://www.ds-sewing.com/truck_acc/bulkhead/bulkhead.html"));    
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_fenders.gif","Check out our Aluminum Fenders for trucks","https://www.ds-sewing.com/truck_acc/fender_deck/fender.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_cabguards.gif","Check out our Aluminum Cab Guards for Trucks","https://www.ds-sewing.com/truck_acc/cabguard/cabguard1.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_framestep.gif","Check out our Aluminum truck accessories","https://www.ds-sewing.com/truck_acc/accessories/aluminum_acc.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_loggerguard.gif","Check out our Logger Guards for Trucks","https://www.ds-sewing.com/truck_acc/cabguard/loggerguard.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_fenderbrackets.gif","Check out our Aluminum Fender Mount brackets for Trucks","https://www.ds-sewing.com/truck_acc/fender_deck/fenderbracket.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_dynadrom.gif","Check out our Dyna Droms for Trucks","https://www.ds-sewing.com/truck_acc/cabguard/dynadrom.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_deckplate.gif","Check out our Aluminum Deck Covers for trucks","https://www.ds-sewing.com/truck_acc/fender_deck/deckcover.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_loadlock.gif","Check out our Aluminum load lock carriers for Trucks","https://www.ds-sewing.com/truck_acc/accessories/aluminum_acc.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_tirecarriers.gif","Check out our Aluminum Tire Carriers for Trucks","https://www.ds-sewing.com/truck_acc/accessories/aluminum_acc.php"));
    // boat
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_boat.gif","Check out our Dry-Dock Tarps for Boats","https://www.ds-sewing.com/boat/boat.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_boat2.gif","Check out our Dry-Dock Tarps for Boats","https://www.ds-sewing.com/boat/boat.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_boat3.gif","Check out our Dry-Dock Tarps for Boats","https://www.ds-sewing.com/boat/boat.php"));
   // banner
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_banner.gif","Check out our Banner Blanks for the Sign Industry","https://www.ds-sewing.com/banner/banner1.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_banner1.gif","Check out our Banner Blanks for the Sign Industry","https://www.ds-sewing.com/banner/banner1.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_banner2.gif","Check out our Banner Blanks for the Sign Industry","https://www.ds-sewing.com/banner/banner1.php"));
    // industrial sewing & heat sealing
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_grain.jpg","Check out our Grain Covers","https://www.ds-sewing.com/custom/custom6.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_schoolcover.gif","Check out our Custom Sewn Products","https://www.ds-sewing.com/custom/custom.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_custom.gif","Check out our Custom Sewn Products","https://www.ds-sewing.com/custom/custom.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_pumkinsling.gif","Check out our Custom Sewn Products","https://www.ds-sewing.com/custom/customtarp/pumpkin_sling.php"));
    // pool
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_pool.jpg","Check out our Custom Pool Covers","https://www.ds-sewing.com/pool/pool.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_pool.gif","Check out our Custom Pool Covers","https://www.ds-sewing.com/pool/pool.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_pool2.gif","Check out our Custom Pool Covers","https://www.ds-sewing.com/pool/pool.php"));
   list = list.concat(new list_image("https://www.ds-sewing.com/images/toolbar_images/window/window_pool3.gif","Check out our Custom Pool Covers","https://www.ds-sewing.com/pool/pool.php"));
      
 
   function click_rot() {
    window.location = list[rnd].href;
   }
   
 
   // timer function, wack-a-do
   function time_time() {
    var dtNow = new Date();
    var diff = dtNow.getTime() - starttime;
	
	//window.status = diff;
	
	rnd = Math.floor((Math.random() * list.length));
	
 	document.forms[0].ROTIMG.src = list[rnd].src; //"/images/" + list[rnd].src;   
  	document.forms[0].ROTIMG.alt = list[rnd].alt;	 		
  	        				
    return diff/1000; 
   }
   
  
  window.setInterval ('time_time()',5000);		
//-->




