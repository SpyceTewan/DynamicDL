let open = false;

function setOpen(o){
	if(o === true){
		$(".container").css("visibility", "showing");
	}else if(o !== false){
		$(".container").css("visibility", "hidden");
	}
	open = o;
}