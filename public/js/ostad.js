// console.log(Shopify);
const createOstIframe = () => {
    const ostGeneralFaq = document.getElementById('ostad-general-faq');
    //get data-group from this div
    const ostDataGroup = ostGeneralFaq.getAttribute('data-group') || 1;
    const ostLink = `https://happy-epic-dog.ngrok-free.app/storefront/widgets/general-faq/${ostDataGroup}?shop=${Shopify.shop}`;
    // const ostLink = `http://localhost:8000/storefront/widgets/general-faq?shop=${Shopify.shop}`;
    const ostIframe = document.createElement('iframe');

    ostIframe.src = ostLink;
    ostIframe.frameBorder = "0";
    ostIframe.scrolling = "yes";
    ostIframe.width = "100%";
    ostIframe.height = "100%";
    ostIframe.style = "min-height: 420px;";

    ostGeneralFaq.appendChild(ostIframe);
};

createOstIframe();


