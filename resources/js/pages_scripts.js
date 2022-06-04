function redirectToLink()
{
    const url = this.attributes.getNamedItem('data-url').value;
    window.location.replace(url);
}

const page_elements = document.getElementsByClassName('bio-contanct-container');
for(let i = 0; i < page_elements.length; i++)
{
    page_elements[i].onclick = redirectToLink;
}