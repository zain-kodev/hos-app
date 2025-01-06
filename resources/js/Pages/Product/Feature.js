import React, { useState }  from "react";
import {BodyText, Heading1, Heading2, Heading3, Heading5} from "@/Components/Elements";
import { formatCurrency } from "@/Helpers/helpers";
import { StarIcon } from "@heroicons/react/solid";
import SelectQuantity from "./SelectQuantity";
import Button from "@/Components/Button";
import Radiobutton from "@/Components/Radiobutton";
import { useForm } from "@inertiajs/inertia-react";
import ValidationErrors from "@/Components/ValidationErrors";
import Checkbox from "@/Components/Checkbox";
const Feature = ({ product }) => {
    const { data, setData, post, processing, errors } = useForm({
        id: product.id,
        quantity: 1,
    });

    function submit(e) {
        e.preventDefault();
        post(route("shopping-cart.store"), { preserveScroll: true });
    }
    const handleChangeQuantity = (newQuantity) => {
        setData("quantity", newQuantity);
    };

    const onHandleChange = (event) => {
        const value = event.target.type === "checkbox" ?
            (event.target.checked
                    ? [...data[event.target.name] || [], event.target.value]
                    : data[event.target.name].filter(val => val !== event.target.value)
            )
            : event.target.value;

        // For radio buttons, only update the value if the radio button is checked
        if (event.target.type === "radio" && !event.target.checked) {
            return;
        }

        setData(event.target.name, value);
    };

    return (
        <div>
            <Heading3 className="mb-4">{product.name}</Heading3>
            {product.offer ? (
                <>
                    <span className="line-through text-gray-500">{formatCurrency(product.old_price)}</span>
                    <span className="text-green-500 ml-2">{formatCurrency(product.price)}</span>
                </>
            ) : (
                <Heading5 className="mb-3">{formatCurrency(product.price)}</Heading5>
            )}

            <div className="mb-5 flex gap-x-2">
                {[...Array(product.stars).keys()].map((key) => (
                    <StarIcon key={key} className="h-5 w-5 text-gray-800" />
                ))}
            </div>
            <p className="mb-10 font-text" dangerouslySetInnerHTML={{ __html: product.description_min }} />

            <form
                onSubmit={submit}
                className="mb-5 flex flex-col items-center gap-4"
            >
                <div className="mb-5">
                    {product.variations_title.map((vt, key) => (
                        <div>
                            <p key={key} className="text-red-800 text-lg" >{vt.name}</p>

                                {vt.variations.map(variation => (
                                    <div key={variation.id}>
                                        {vt.type ==="checkbox" ? (
                                            <>
                                                <input
                                                    type="checkbox"
                                                    className=" border-gray-300 text-gray-600 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                                                    key={variation.id}
                                                    name={vt.name_en}
                                                    value={variation.name}
                                                    onChange={onHandleChange}
                                                />
                                                <span className="ml-2 text-lg text-gray-600 mr-2">
                                                {variation.name}
                                                </span>
                                            </>
                                        ):(
                                            <>
                                                <input
                                                    type="radio"
                                                    className=" border-gray-300 text-gray-600 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                                                    key={variation.id}
                                                    name={vt.name_en}
                                                    value={variation.name}
                                                    onChange={onHandleChange}
                                                />
                                                <span className="ml-2 text-lg text-gray-600 mr-2">
                                                {variation.name}
                                                </span>
                                            </>
                                        )

                                        }

                                    </div>

                                ))}

                        </div>
                    ))}

                </div>
                <div className="items-center gap-4 md:flex-row">
                    <SelectQuantity
                        quantity={data.quantity}
                        onChange={handleChangeQuantity}
                    />
                    <Button processing={processing}>
                        إضافة للسلة
                    </Button>
                </div>
            </form>
            <ValidationErrors errors={errors} />
        </div>
    );
};

export default Feature;
