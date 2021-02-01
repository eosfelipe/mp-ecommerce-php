document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM fully loaded and parsed");

  const button = document.getElementById("btnCheckout");

  button.addEventListener("click", async () => {
    button.disabled = true;

    const orderData = {
      id: "1234",
      name: document.querySelector("#title").innerHTML,
      description: "Dispositivo móvil de Tienda e-commerce",
      urlImg: document.querySelector("#img").getAttribute("src"),
      quantity: document.querySelector("#unit").innerHTML.trim(),
      price: document.querySelector("#price").innerHTML.trim(),
      orderNumber: "escobedo.felipe@hotmail.com",
    };

    try {
      const response = await fetch("./create_preference.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(orderData),
      });
      const data = await response.json();
      // console.log(data);
      createCheckoutButton(data);
    } catch (error) {
      alert("Unexpected error");
      button.disabled = false;
    }
  });
});

const createCheckoutButton = ({ id, init_point }) => {
  // const url =
  //   "https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js";
  // const script = document.createElement("script");
  // script.src = url;
  // script.type = "text/javascript";
  // script.dataset.preferenceId = id;
  // script.dataset.buttonLabel = "Pagar la compra";
  const link = document.createElement("a");
  link.href = init_point;
  link.classList.add("mercadopago-button");
  link.innerHTML = "Pagar la compra";
  const button = document.getElementById("btnCheckout");
  button.innerHTML = "";
  button.appendChild(link);
};;
