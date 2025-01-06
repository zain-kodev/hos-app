import { BodyText, Heading5 } from "@/Components/Elements";
import React from "react";

const Description = ({ description, weight, dimensions }) => {
    return (
        <div>
            <Heading5 className="mb-4">تفاصيل الباقة</Heading5>
            {/*<table className="mb-4 font-text ">*/}
            {/*    <tbody>*/}
            {/*        <tr>*/}
            {/*            <td>*/}
            {/*                <div className="mr-2 font-medium">Peso</div>*/}
            {/*            </td>*/}
            {/*            <td>{weight}</td>*/}
            {/*        </tr>*/}
            {/*        <tr>*/}
            {/*            <td>*/}
            {/*                <div className="mr-2 font-medium">Dimensiones</div>*/}
            {/*            </td>*/}
            {/*            <td>{dimensions}</td>*/}
            {/*        </tr>*/}
            {/*    </tbody>*/}
            {/*</table>*/}
            <p className="font-text leading-relaxed" dangerouslySetInnerHTML={{ __html: description }} />

        </div>
    );
};

export default Description;
