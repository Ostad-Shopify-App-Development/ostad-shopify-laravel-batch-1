console.log("Hello from FAQ Laravel extension!")
// console.log(Shopify);
const createOstIframe = () => {
    const ostGeneralFaq = document.getElementById('ostad-general-faq');
    const dataGroupId = ostGeneralFaq.getAttribute('data-groupid');
    console.log({dataGroupId})
    const ostLink = `https://happy-epic-dog.ngrok-free.app/storefront/widgets/general-faq/${dataGroupId}?shop=${Shopify.shop}`;
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
