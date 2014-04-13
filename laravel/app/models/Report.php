<?php
class Report extends Eloquent {

    protected $table = 'reports';

    /**
     * One report belongs to a product
     * @return Group
     */
    public function product()
    {
        return $this->belongsTo('Product');
    }

    /**
     * Get the step in the report
     * @return int
     */
    public function getStep()
    {
        return ($this->step == null) ? 1 : $this->step;
    }

    /**
     * Increment the step
     * @return void
     */
    public function bumpStep()
    {
        $this->step = $this->getStep();
        $this->step++;
    }


    public function optionsMap($id)
    {
        $options[1] = "I wouldn't buy this";
        $options[2] = "I would buy this for a friend";
        $options[3] = "I would buy this someone in my family";
        $options[4] = "I'd quite like this for myself";
        $options[5] = "I'd like to buy this for someone right now";
        $options[6] = "I've seen this product before";
        $options[7] = "This is the first time I've seen this product";

        return $options[$id];
    }

    public function saveProduct($product, $input)
    {
        $this->q1           = (!empty($input['q1'])) ? $input['q1'] : "";
        $this->q2           = (!empty($input['q2'])) ? implode(", ", $input['q2']) : "";
        $this->q3           = (!empty($input['q3'])) ? $input['q3'] : "";
        $this->q4           = (!empty($input['q4'])) ? $input['q4'] : "";
        $this->session_id   = session_id();
        $this->product_id   = $product->id;

        $this->save();
    }
}
