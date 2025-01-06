import { Heading5 } from "@/Components/Elements";
import { formatCurrency } from "@/Helpers/helpers";
import React from "react";

const TableTotal = ({ products, subTotal, discount, total,tax, ser_tax }) => {
    return (
        <table className="w-full table-fixed">
            <thead>

            </thead>
            <tbody className="divide-y divide-gray-200  font-text">
            {/*{products.map((product, index) => (*/}
            {/*    <tr key={index}>*/}
            {/*        <td className=" p-4 text-right">*/}
            {/*            {product.quantity} x {product.name}*/}
            {/*        </td>*/}
            {/*        <td className=" p-4 text-right">*/}
            {/*            {formatCurrency(product.total_price_quantity)}*/}
            {/*        </td>*/}
            {/*    </tr>*/}
            {/*))}*/}

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
            <tr className=" bg-gray-100 ">
                <td className="p-4 text-right">رسوم الخدمة</td>
                <td className="p-4 text-right">
                    {formatCurrency(ser_tax)}
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
                                الضريبة (15%)
                            </td>
                            <td className="p-4 text-right">
                                {formatCurrency(tax)}
                            </td>
                        </tr>
                        {/*<tr className="font-semibold italic">*/}
                        {/*    <td className="p-4 text-right ">Envio</td>*/}
                        {/*    <td className="p-4 text-right">*/}
                        {/*        {formatCurrency(order.shipping)}*/}
                        {/*    </td>*/}
                        {/*</tr>*/}
            <tr className="bg-gray-100 text-xl font-bold">
                <td className="p-4 text-right ">المجموع النهائي</td>
                <td className="p-4 text-right">{formatCurrency(total+tax+ser_tax)}</td>
            </tr>
            </tbody>
        </table>
    );
};

export default TableTotal;
