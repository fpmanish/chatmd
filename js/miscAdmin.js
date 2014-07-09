// All misc functionlaities of the admin panel
// Manish Sonwal 15-feb 2013 (m_sonwal@yahoo.co.in)
function deleteConfirmation(url)
{
	if(url.length && confirm("Are you sure to delete this?"))
		location.href = url;
}