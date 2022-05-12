function ChCam()
{
	/* Funckja zamieniająca kamery */
	/* Po włączeniu kamery 2  */
	var first_cam = document.querySelector('[cam1]');
	console.log(first_cam.getAttribute('camera'));
	var second_cam = document.querySelector('[cam2]');
	console.log(second_cam.getAttribute('camera'));

	if(second_cam.getAttribute('camera').active == false)
	{
		first_cam.setAttribute('camera','active','false');
		second_cam.setAttribute('camera','active','true');
		
	}
	else
	{
		second_cam.setAttribute('camera','active','false');
		first_cam.setAttribute('camera','active','true');
	}

}
