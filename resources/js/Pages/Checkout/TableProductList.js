import { Heading5 } from "@/Components/Elements";
import { formatCurrency } from "@/Helpers/helpers";
import React from "react";

const TableProductList = ({ products, subTotal, discount,tax_percent ,tax_amount , total }) => {
    return (
        <table className="w-full table-fixed">
            <thead>
                <tr>
                    <th className="py-4 px-2 text-right">
                        <Heading5>الطلب</Heading5>
                    </th>
                    <th className="py-4 px-2 text-right">
                        <Heading5>المبلغ</Heading5>
                    </th>
                </tr>
            </thead>
            <tbody className="divide-y divide-gray-200  font-text">
                {products.map((product, index) => (
                    <tr key={index}>
                        <td className=" p-4 text-right">
                            {product.quantity} x {product.name}
                        </td>
                        <td className=" p-4 text-right">
                            {formatCurrency(product.total_price_quantity)}
                        </td>
                    </tr>
                ))}
                {/*<tr className=" bg-gray-100 italic">*/}
                {/*    <td className="p-4 text-right">طريقة الدفع او السداد</td>*/}
                {/*    <td className="p-4 text-right">عند تسليم</td>*/}
                {/*</tr>*/}
                <tr className=" bg-gray-100 ">
                    <td className="p-4 text-right">المجموع الفرعي</td>
                    <td className="p-4 text-right">
                        {formatCurrency(subTotal)}
                    </td>
                </tr>

                {discount && (
                    <tr className="bg-gray-100 text-green-500">
                        <td className="p-4 text-right ">التخفيض (الكوبون)</td>
                        <td className="p-4 text-right">
                            {formatCurrency(discount.applied)}
                        </td>
                    </tr>
                )}
                 <tr className="font-semibold italic">
                            <td className="p-4 text-right ">
                                الضريبة ({tax_percent}%)
                            </td>
                            <td className="p-4 text-right">
                                {formatCurrency(tax_amount)}
                            </td>
                 </tr>

                <tr className="bg-gray-100 text-xl font-bold">
                    <td className="p-4 text-right ">المجموع النهائي</td>
                    <td className="p-4 text-right">{formatCurrency(total)}</td>
                </tr>
            </tbody>
        </table>
    );
};

export default TableProductList;
