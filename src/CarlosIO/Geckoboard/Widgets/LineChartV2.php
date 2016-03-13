<?php

namespace CarlosIO\Geckoboard\Widgets;

/**
 * Class LineChart
 * @package CarlosIO\Geckoboard\Widgets
 */
class LineChartV2 extends Widget
{
    /**
     * @var array
     */
    protected $series;

    /**
     * @var array
     */
    protected $xAxis;

    /**
     * @var array
     */
    protected $yAxis;


    /**
     * Set the items property
     *
     * @param string $name The name of the series
     * @param array $data Set of items to add to the widget
     * @return $this
     */
    public function addSerie($name, array $data)
    {
        $this->series[] = array(
            'name' => $name,
            'data' => $data,
        );

        return $this;
    }

    /**
     * Return the items attribute
     *
     * @return array
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Optional configuration options for the X axis.
     *
     * @param array $labels The The labels for the xaxis
     * @param string $type Specifying the string "datetime" will cause all X axis values to be
     *                     interpreted as an ISO 8601 date/time. Partial dates (e.g. 2014-10
     *                     for October 2014) are supported.
     * @return $this
     */
    public function setXAxis($labels, $type = '')
    {
        $this->xAxis = array(
            'labels' => $labels,
            'type'   => $type,
        );

        return $this;
    }

    public function setYaxis($format, $unit = '')
    {
        $this->yAxis = array(
            'format' => $format,
            'unit' => $unit,
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $ret = array('series' = $this->getSeries());
        if ($this->xAxis) {
            $ret['x_axis'] = $this->xAxis;
        }
        if ($this->yAxis) {
            $ret['y_axis']  = $this->yAxis;
        }
        return $ret;
    }
}
