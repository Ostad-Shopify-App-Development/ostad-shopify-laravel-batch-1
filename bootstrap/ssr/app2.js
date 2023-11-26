import axios from "axios";
import * as Turbo from "@hotwired/turbo";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
Turbo.start();
async function getSessionToken() {
  return await utils.getSessionToken(window.app);
}
document.addEventListener("turbo:before-fetch-request", (event) => {
  let fetchOptions = event.detail.fetchOptions;
  getSessionToken();
  fetchOptions.headers["Authorization"] = `Bearer ${window.sessionToken}`;
  console.log("Request started!");
});
