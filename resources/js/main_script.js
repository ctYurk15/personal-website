function redirectToPage()
{
    const page = this.attributes.getNamedItem('data-page').value;
    const url = window.location.toString()+page;
    window.location.replace(url);
}

const page_elements = document.getElementsByClassName('page');
for(let i = 0; i < page_elements.length; i++)
{
    page_elements[i].onclick = redirectToPage;
}