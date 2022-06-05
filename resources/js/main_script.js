function redirectToPage()
{
    const page = this.attributes.getNamedItem('data-page').value;
    window.location.replace(page);
}

const page_elements = document.getElementsByClassName('page');
for(let i = 0; i < page_elements.length; i++)
{
    page_elements[i].onclick = redirectToPage;
}