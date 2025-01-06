import { Heading5 } from "@/Components/Elements";
import React from "react";
import CartProduct from "./CartProduct";

const CartProductList = ({products}) => {
    return (
        <table className="mb-8 w-full table-auto ">
            <thead>
                <tr className="border-b border-gray-200">
                    <th className="w-10 py-4 px-2 text-right">&nbsp;</th>
                    <th className="hidden w-20 py-4 px-2 text-left md:table-cell">
                        &nbsp;
                    </th>
                    <th className="py-4 px-2 text-right">
                        <Heading5> الباقة - الخدمة </Heading5>
                    </th>
                    <th className="py-4 px-2 text-right">
                        <Heading5> السعر </Heading5>
                    </th>
                    <th className="py-4 px-2 text-right">
                        <Heading5> الكمية </Heading5>
                    </th>
                    <th className="hidden py-4 px-2 text-right md:table-cell">
                        <Heading5> الاجمالي </Heading5>
                    </th>
                </tr>
            </thead>
            <tbody>
                {products.map((product) => (
                    <CartProduct key={product.id} product={product} />
                ))}
            </tbody>
        </table>
    );
};

export default CartProductList;
