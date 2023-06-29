  //Optional Chaining object ni value defined na hoy to Error pass na kre ne undefined return kre

  const car = { type: "Fiat", model: "500", color: "white" };
  let name = car?.name;
  console.log(name);

  const user = ["KK bhai", "Raju", "Bapu"];
  console.log(user?.[2]);
